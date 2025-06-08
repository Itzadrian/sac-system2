<?php
class LawEnforcement {
    public function verify_sac($code) {
        global $dbase;
        $code = $dbase->escape_value($code);
        $sql = "SELECT * FROM access_codes WHERE sac = '{$code}' LIMIT 1";
        $result = $dbase->query($sql);
        return mysqli_num_rows($result) == 1;
    }
}
$officer = new LawEnforcement();
