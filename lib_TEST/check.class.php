<?php
/**
 * ===========================================================================================
 * Programm:    Template_Engine
 * Datei:       PageCheck.php
 * Autor:       klem
 * ---------------------------------------------------------
 * Datum:       21.05.13 --> Erstelldatum
 * Update:
 * ===========================================================================================
 */
    class Check {
        /** ======================================
         *  GET Variabeln aufbereiten
         * =======================================
         */
        public function PageGetVars($var=NULL) {
            $Check      = new Check;
            $vGET       = NULL;

            if (isset($var)) {
                foreach($_GET as $key => $value) {
                    if ($var == $key) {
                        $vGET = $Check->GetVar($value);
                    }
                }
            } else {
                foreach($_GET as $key => $value) {
                    $vGET[] = array(
                        $key => $Check->GetVar($value)
                    );
                }
            }
            return $vGET;
        }


        /** ======================================
         *  GET Variabeln aufbereiten
         * =======================================
         */
        public function PagePostVars($var=NULL) {
            $Check      = new Check;
            $vPOST      = NULL;

            if (isset($var)) {
                foreach($_POST as $key => $value) {
                    if ($var == $key) {
                        $vPOST = $Check->PostVar($value);
                    }
                }
            } else {
                foreach($_POST as $key => $value) {
                    $vPOST[] = array(
                        $key => $Check->PostVar($value)
                    );
                }
            }
            return $vPOST;
        }


        /** ======================================
         *  GET Variabeln überprüfen
         * =======================================
         */
        public function GetVar($var) {
            if (isset($var)) {
                if ($var == NULL || preg_match(PAR_WHITELIST, $var)) {
                    return $var;
                } else {
                    ?>
                    <script>
                        <!--
                        window.location.replace('index.php');
                        //-->
                    </script>
                <?php
                }
            }
        }


        /** ======================================
         *  POST Variabeln überprüfen
         * =======================================
         */
        public function PostVar($var) {
            if ($var == NULL || preg_match(PAR_WHITELISTFULL, $var)) {
                return $var;
            } else {
                return '';
            }
        }


        /** ======================================
         *  Nav
         * =======================================
         */
        public function NavSelect($nav, $get) {
            if ($nav == $get) {
                return 'class="active"';
            } else {
                return '';
            }
        }


        /** ======================================
         *  Check
         * =======================================
         */
        public function RadioChecked($post, $id) {
            if ($post == $id) {
                return 'checked="checked"';
            } else {
                return '';
            }
        }

        public function SelectChecked($post, $id) {
            if ($post == $id) {
                return 'selected="selected"';
            } else {
                return '';
            }
        }
    }

?>