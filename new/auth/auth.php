<?php

session_start();

include("../pack/config/configuration.php");

$errors = array();

if (isset($_POST['logging'])) {
    $id = mysqli_real_escape_string($connetion, $_POST['id']);
    $password = mysqli_real_escape_string($connetion, $_POST['password']);
    $role = mysqli_real_escape_string($connetion, $_POST['type']);

    if (empty($id)) {
        array_push($errors, "Id is required.");
    }
    if (empty($password)) {
        array_push($errors, "Password is required.");
    }
    if ($role == "none") {
        array_push($errors, "Role is required.");
    }

    if (count($errors) == 0) {
        if ($role == 'student') {
            $get_student_query = "";
            $result_student_query = mysqli_query($connection, $get_student_query);
            if (mysqli_num_rows($result_student_query) == 1) {
                $_SESSION['user_id'] = $id;
                $_SESSION['user_role'] = $role;
                $_SESSION['session_status'] = true;
                ?>
                <script>
                    window.location.replace("../user/student");
                </script>
                <?php
            }
            else {
                array_push($errors, "Id or password is wrong.");
            }
        }
        else if ($role == 'teacher') {
            $get_teacher_query = "";
            $result_teacher_query = mysqli_query($connection, $get_teacher_query);
            if (mysqli_num_rows($result_teacher_query) == 1) {
                $_SESSION['user_id'] = $id;
                $_SESSION['user_role'] = $role;
                $_SESSION['session_status'] = true;
                ?>
                <script>
                    window.location.replace("../user/teacher");
                </script>
                <?php
            }
            else {
                array_push($errors, "Id or password is wrong.");
            }
        }
        else if ($role == 'agent') {
            $get_agent_query = "";
            $result_agent_query = mysqli_query($connection, $get_agent_query);
            if (mysqli_num_rows($result_agent_query) == 1) {
                $_SESSION['user_id'] = $id;
                $_SESSION['user_role'] = $role;
                $_SESSION['session_status'] = true;
                ?>
                <script>
                    window.location.replace("../user/agent");
                </script>
                <?php
            }
            else {
                array_push($errors, "Id or password is wrong.");
            }
        }
        else if ($role == 'admin') {
            $get_admin_query = "";
            $result_admin_query = mysqli_query($connection, $get_admin_query);
            if (mysqli_num_rows($result_admin_query) == 1) {
                $_SESSION['user_id'] = $id;
                $_SESSION['user_role'] = $role;
                $_SESSION['session_status'] = true;
                ?>
                <script>
                    window.location.replace("../user/admin");
                </script>
                <?php
            }
            else {
                array_push($errors, "Id or password is wrong.");
            }
        }
        else {
            array_push($errors, "Sorry, something went wrong.");
        }
    }
}