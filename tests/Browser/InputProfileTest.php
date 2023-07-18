<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class InputProfileTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testShowPage(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Form Input Pengguna');
        });
    }

    public function testInputCorrectName(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->type('data', 'Rizky 20 Malang')
                    ->press('Submit')
                    ->assertSee('Data berhasil disimpan.');
        });
    }

    public function testInputCorrectNameTwoWord(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->type('data', 'Rizky Pratama 20 Malang')
                    ->press('Submit')
                    ->assertSee('Data berhasil disimpan.');
        });
    }

    public function testInputCorrectNameThreeWord(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->type('data', 'Rizky Pratama Putra 20 Malang')
                    ->press('Submit')
                    ->assertSee('Data berhasil disimpan.');
        });
    }

    public function testCorrectInputWithoutName(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->type('data', '20 Malang')
                    ->press('Submit')
                    ->assertSee('Data berhasil disimpan.');
        });
    }

    public function testCorrectInputWithoutCity(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->type('data', 'Rizky 20')
                    ->press('Submit')
                    ->assertSee('Data berhasil disimpan.');
        });
    }

    public function testWrongInputWithoutAge(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->type('data', 'Rizky Malang')
                    ->press('Submit')
                    ->assertSee('Format data tidak valid. Pastikan menggunakan format NAMA USIA KOTA.');
        });
    }

    public function testWrongInputWithoutAgeAndCity(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->type('data', 'Rizky')
                    ->press('Submit')
                    ->assertSee('Format data tidak valid. Pastikan menggunakan format NAMA USIA KOTA.');
        });
    }

    public function testWrongInputWithoutNameAndAge(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->type('data', 'Malang')
                    ->press('Submit')
                    ->assertSee('Format data tidak valid. Pastikan menggunakan format NAMA USIA KOTA.');
        });
    }
}
