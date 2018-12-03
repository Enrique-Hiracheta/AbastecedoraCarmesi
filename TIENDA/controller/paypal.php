<?php
$configPaypal = array(
    // set your paypal credential
    'client_id' => 'AVRSXZRo8PJyG7tpVX1cfJh6r_Aq-bL0hxo6eQnuaRoes6-8GiOZSmwyvFvmJcMk8F9oX72a-9s33DrP',
    'secret' => 'EJkiyJGWUCdXBDdvYOXAz3lq2eL6l2Elv65eIANFMP6z7FWZmOmX31-tgQ6H-SPqu50xLnfPvvpNBkVG',

    /**
     * SDK configuration 
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => false,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);