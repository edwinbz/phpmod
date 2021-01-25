<?php
class EncryptPlugin
{ 
    public function encryptPass($pass)
    { 
        return md5($pass);
    }
}
