<?php

// function for check validate email
function domain_exists($email, $record = 'MX'){
    list($user, $domain) = explode('@', $email);
    return checkdnsrr($domain, $record);
    }

