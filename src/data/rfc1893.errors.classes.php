<?php
$status_code_classes['2']['title'] =  "Success";
$status_code_classes['2']['descr'] =  "Success specifies that the DSN is reporting a positive delivery action.  Detail sub-codes may provide notification of transformations required for delivery.";

$status_code_classes['4']['title'] =  "Persistent Transient Failure";
$status_code_classes['4']['descr'] =  "A persistent transient failure is one in which the message as sent is valid, but some temporary event prevents the successful sending of the message.  Sending in the future may be successful.";

$status_code_classes['5']['title'] =  "Permanent Failure";
$status_code_classes['5']['descr'] =  "A permanent failure is one which is not likely to be resolved by resending the message in the current form.  Some change to the message or the destination must be made for successful delivery.";

return $status_code_classes;