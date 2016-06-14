<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class ComplainFunctionTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateComplain()
    {
        $user = User::whereName('RUSDI SENIK')->first();
        $this->actingAs($user);
        $this->visit('/complain/create');
        $this->type('1-107', 'complain_category_id');
        $this->type('20', 'branch_id');
        $this->type('238', 'lokasi_id');
        $this->type('1946', 'ict_no');
        $this->type('3', 'complain_source_id');
        $this->type('Testing function complain v40', 'complain_description');
//        $this->attach('\Users\alienware\Pictures\zakat2.jpg', 'complain_attachment');
        $this->press('Hantar');
        $this->seePageIs('/complain');
        $this->visit('/complain');
        $this->see('Senarai Aduan');
    }
}
