<?php
session_start();
require_once "config/database.php";

$username = $password = "";
$username_err = $password_err = $login_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT id, name, password, is_admin FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    mysqli_stmt_bind_result($stmt, $id, $name, $db_password, $is_admin);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $db_password)){
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $name;
                            $_SESSION["role"] = $is_admin ? "admin" : "user";
                            
                            header("location: dashboard.php");
                        } else{
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    mysqli_close($conn);
}
?>
<?php
$page_title = 'Login — CSPC Supreme Student Council';
$page_description = 'Sign in to your CSPC Supreme Student Council account to access the admin dashboard.';
include 'includes/head.php';
?>
<body class="gradient-bg min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <div class="flex justify-center mb-6">
                <img src="https://i.ibb.co/Cp38FdLC/logo.png" alt="CSPC-SSC Logo" class="h-16 w-16 object-contain bg-white rounded-full p-2">
            </div>
            <h2 class="text-3xl font-bold text-white mb-2">Welcome Back</h2>
            <p class="text-blue-100">Sign in to your CSPC-SSC account</p>
        </div>
        
        <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl p-8 shadow-2xl">
            <?php if(!empty($login_err)): ?>
                <div id="login-alert" class="flex items-center p-4 mb-6 text-red-800 rounded-lg bg-red-50" role="alert">
                    <i class="fas fa-exclamation-circle flex-shrink-0 mr-2"></i>
                    <span class="text-sm font-medium"><?php echo htmlspecialchars($login_err); ?></span>
                    <button type="button" data-dismiss-target="#login-alert" aria-label="Close"
                            class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg p-1.5 hover:bg-red-200 inline-flex h-8 w-8 items-center justify-center">
                        <i class="fas fa-times text-xs"></i>
                    </button>
                </div>
            <?php endif; ?>
            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="space-y-5">
                <div>
                    <label class="block mb-2 text-sm font-medium text-white">
                        <i class="fas fa-envelope mr-2"></i>Email
                    </label>
                    <input type="email" name="username"
                           class="bg-white/90 border <?php echo !empty($username_err) ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-blue-500 focus:border-blue-500'; ?> text-gray-900 text-sm rounded-lg block w-full p-2.5 placeholder-gray-400"
                           value="<?php echo htmlspecialchars($username); ?>"
                           placeholder="Enter your email address">
                    <?php if(!empty($username_err)): ?>
                        <p class="mt-1 text-sm text-red-300 flex items-center gap-1">
                            <i class="fas fa-exclamation-triangle text-xs"></i><?php echo $username_err; ?>
                        </p>
                    <?php endif; ?>
                </div>
                
                <div>
                    <label class="block mb-2 text-sm font-medium text-white">
                        <i class="fas fa-lock mr-2"></i>Password
                    </label>
                    <input type="password" name="password"
                           class="bg-white/90 border <?php echo !empty($password_err) ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-blue-500 focus:border-blue-500'; ?> text-gray-900 text-sm rounded-lg block w-full p-2.5 placeholder-gray-400"
                           placeholder="Enter your password">
                    <?php if(!empty($password_err)): ?>
                        <p class="mt-1 text-sm text-red-300 flex items-center gap-1">
                            <i class="fas fa-exclamation-triangle text-xs"></i><?php echo $password_err; ?>
                        </p>
                    <?php endif; ?>
                </div>
                
                <button type="submit"
                        class="w-full text-blue-700 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-white/50 font-semibold rounded-lg text-sm px-5 py-2.5 text-center transition-colors">
                    <i class="fas fa-sign-in-alt mr-2"></i>Sign In
                </button>
            </form>
            
            <div class="mt-5 text-center">
                <a href="index.php" class="text-blue-100 hover:text-white transition-colors text-sm">
                    <i class="fas fa-arrow-left mr-1"></i>Back to Home
                </a>
            </div>
        </div>
        
        <div class="text-center">
            <p class="text-blue-100 text-sm">
                                            &copy; <?php echo date("Y"); ?> CSPC - Supreme Student Council. All rights reserved.
            </p>
        </div>
    </div>
</body>
</html> 