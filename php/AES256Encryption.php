<?php
/**
 * AES256Encryption.php
 *
 * Copyright Miah Abdullah Shekhar (c) 2022 <shekharabdullah88@gmail.com>
 * Licensed under the MIT license
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 * @author Miah Abdullah Shekhar <shekharabdullah88@gmail.com>
 * @license MIT
 */
class AES256Encryption{
    /**
     * $sharedkey 32 -characters secret password
     */
    private static $sharedkey = 'ABCDABCDABCDABCDABCDABCDABCDABCD';

    /**
     * $method aes-256-cbc encryption method
     */
    private static $method = 'aes-256-cbc';
    
    /**
     * check shared key length. It is required exact 32 chars
     */
    private static function checkKey(){
        if(strlen(self::$sharedkey) != 32) throw new Exception('"sharedkey length is not 32 chars"'); 
    }

    /**
     * Encrypt message by AES-256-CBC algorithm
     *
     * @param string $message Text for encryption
     *
     * @return self encrypted message
     */
    function encrypt($message){
        self::checkKey();
        $iv = substr(self::$sharedkey, 0, 16);
        return openssl_encrypt($message, self::$method, self::$sharedkey, 0, $iv);
    }

    /**
     * Decrypt encrypted message by AES-256-CBC algorithm
     *
     * @param string $encryptedMessage Text for encryption
     *
     * @return self decrypted message
     */
    static function decrypt($encryptedMessage){
        self::checkKey();
        $iv = substr(self::$sharedkey, 0, 16);
        return openssl_decrypt($encryptedMessage, self::$method, self::$sharedkey, 0, $iv);
    }
}
?>