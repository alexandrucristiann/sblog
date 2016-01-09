<?php

try {
    $sql = new SqlHandler();
} catch (CriticalFaultException $e) {
    header('Location: ' . APP_WEBSITE . 'unavailable.php?error=' . urlencode($e->getMessage()));
}
try {
    $sql->connect();
} catch (CriticalFaultException $e) {
    header('Location: '.APP_WEBSITE.'unavailable.php?error='.urlencode($e->getMessage()));
}