package aes256;

import java.util.Base64;

import javax.crypto.Cipher;

import javax.crypto.spec.IvParameterSpec;

import javax.crypto.spec.SecretKeySpec;

public class AES256 {
	/**
     * SHARED_KEY 32 -characters secret password
     */
	private static final String SHARED_KEY = "ABCDABCDABCDABCDABCDABCDABCDABCD";
	/**
     * IV from Shared key
     */
	private static final String IV=SHARED_KEY.substring(0, 16);
	
	/**
     * generating cipher
     *
     * @param encryptMode for Encryption Mode
     *
     * @return cipher
     */
	private static Cipher cipher(int encryptMode){
        if(SHARED_KEY.length() != 32) throw new RuntimeException("SHARED_KEY length is not 32 chars");
        Cipher cipher=null;
        try {
        	cipher = Cipher.getInstance("AES/CBC/PKCS5Padding");
            SecretKeySpec secretKeySpec = new SecretKeySpec(SHARED_KEY.getBytes(), "AES");
            IvParameterSpec ivParameterSpec = new IvParameterSpec(IV.getBytes());
            cipher.init(encryptMode, secretKeySpec, ivParameterSpec);
        }catch(Exception e) {
        	e.printStackTrace();
        }
        
        return cipher;
    }
	
	/**
     * Encrypt message by AES-256-CBC algorithm
     *
     * @param string $message Text for encryption
     *
     * @return self encrypted message
     */
	public static String encrypt(String message){
		String encryptedMessage="";
        try{
            byte[] encrypted = cipher(Cipher.ENCRYPT_MODE).doFinal(message.getBytes("UTF-8"));
            encryptedMessage= new String(Base64.getEncoder().encode(encrypted));
        }catch(Exception e){
            e.printStackTrace();
        }
        return encryptedMessage;
    }
	
	/**
     * decrypt encrypted message by AES-256-CBC algorithm
     *
     * @param string $encryptedMessage Text for encryption
     *
     * @return decrypted message
     */
	public static String decrypt(String encryptedMessage){
    	String decryptedMessage="";
        try{
            byte[] byteStr = Base64.getDecoder().decode(encryptedMessage.getBytes());
            decryptedMessage= new String(cipher(Cipher.DECRYPT_MODE).doFinal(byteStr),"UTF-8");
        }catch(Exception e){
            e.printStackTrace();
        }
        return decryptedMessage;
    }
}
