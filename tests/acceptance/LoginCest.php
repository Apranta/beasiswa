<?php


class LoginCest
{
    public function loginTest(AcceptanceTester $I)
    {
        $I->wantTo('Test login page');
        $I->amOnPage('/login');
        $I->see('Masukkan NIM sebagai username dan PIN yang anda dapatkan sebagai password');
        
        $I->fillField(['name' => 'nim'], 'xxxxxxx');
        $I->fillField(['name' => 'pin'], 'yyyyyyy');
        $I->click(['name' => 'login']);
        $I->see('NIM atau PIN yang anda masukkan salah');
    
        $I->click(['id' => 'back-button']);
        $I->see('Jika anda sudah mendapatkan PIN dari sistem kami, silahkan klik tombol Login. Jika tidak, silahkan klik tombol Request PIN');
    }
}
