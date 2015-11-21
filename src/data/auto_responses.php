<?php
#
# Mapping of bounce responses to RFC1893 codes
#
return [
    '^\[?auto.{0,20}reply\]?',
    '^auto-?response',
    '^auto response',
    '^Thank you for your email\.',
    '^Vacation.{0,20}(reply|respon)',
    '^out.?of (the )?office',
    '^(I am|I\'m).{0,20}\s(away|on vacation|on leave|out of office|out of the office)',
    "\350\207\252\345\212\250\345\233\236\345\244\215"   #sino.com,  163.com  UTF8 encoded
];