<?php

    /**
     * This method add online users to a list of users.
     * @param username is the username
     * 
     */
    function setUserOnline($username) {
        $myfile = fopen('../data/online.txt', 'a');
        fwrite($myfile, "$$--" . $username);
        fclose($myfile);
    }

    /**
     * This method removes users that are not online anymore
     * from our list.
     * @param username is the username
     * 
     */
    function setUserOffline($username) {
        $content = file_get_contents('../data/online.txt');
        $content = str_replace("$$--" . $username, "", $content);
        file_put_contents('../data/online.txt', $content);
    }

    /**
     * This method returns the list of online users.
     * @return array of online users
     * 
     */
    function getOnlines() {
        $content = file_get_contents('data/online.txt');
        return explode("$$--", $content);
    }

    /**
     * This method checks if a user is online or not.
     * @param username is the name of the user to check
     * @return boolean true means online and false means not
     */
    function isOnline($username) {
        $list = getOnlines();
        foreach($list as $user) {
            if ($user == $username)
                return true;
        }
        return false;
    }
?>