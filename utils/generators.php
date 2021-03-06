<?php

  function email_generator( $regnum, $role ) {
    $email = '';
    $prefix = 'adm';
    $suffix = '@uni.thess.gr';

    if($role === 'student'){
        $prefix = 'stu';
    }

    if($role === 'teacher'){
        $prefix = 'sep';
    }

    $email .= $prefix;
    $email .= $regnum;
    $email .= $suffix;

    return $email;
  }

  function random_password( $length = 8 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
  }

  function random_num( $length = 6){
    $chars = "0123456789";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
  }