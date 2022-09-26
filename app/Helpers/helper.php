<?php

    function formatDateTime($dateTime)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $dateTime)->format('H:i:s - d/m/Y');
    }

    function formatPhoneNumber($phoneNumber)
    {
        $celPhone   = 11;
        $phone      = preg_replace("/\D/", "", $phoneNumber);

        if(strlen($phone) === $celPhone){
            return preg_replace("/(\d{2})(\d{1})(\d{4})(\d{2})/", "(\$1) \$2 \$3-\$4", $phone);
        }

        return preg_replace("/(\d{2})(\d{2})(\d{2})/", "(\$1) \$2\$3-", $phone);
    }
    
    function formatMoney($money)
    {
        $clean_money = str_replace('.', '', $money);

        return 'R$ '.number_format($clean_money, 2, ',', '.');
    }

    function formatZipCode($cepNumber)
    {
        $cep = preg_replace("/\D/", "", $cepNumber);

        return preg_replace("/(\d{5})(\d{3})/", "\$1-\$2", $cep);
    }