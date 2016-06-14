<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class NavigationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateComplainLink()
    {
        $user = User::whereName('RUSDI SENIK')->first();
        $this->actingAs($user);
        $this->visit('/complain/create')
            ->see('Hantar Aduan');
    }
    public function testCreateIndexLink()
    {
        $user = User::whereName('RUSDI SENIK')->first();
        $this->actingAs($user);
        $this->visit('/complain')
            ->see('Senarai Aduan');
    }

    public function testComplainShowLink()
    {
        $user = User::whereName('RUSDI SENIK')->first();
        $this->actingAs($user);
        $this->visit('/complain/15670')
            ->see('Maklumat Aduan');
    }

    public function testKemaskiniLink()
    {
        $user = User::whereName('RUSDI SENIK')->first();
        $this->actingAs($user);
        $this->visit('/complain/15673/edit')
            ->see('Maklumat Aduan');
    }

    public function testPaginateLink()
    {
        $user = User::whereName('RUSDI SENIK')->first();
        $this->actingAs($user);
        $this->visit('/complain?page=2')
            ->see('Senarai Aduan')
            ->seePageIs('/complain?page=2');
    }

    public function testReportChartLink()
    {
        $user = User::whereName('RUSDI SENIK')->first();
        $this->actingAs($user);
        $this->visit('/reports/monthly_statistic_aduan')
            ->see('Report Aduan Bulanan');
    }

    public function testReportTableLink()
    {
        $user = User::whereName('RUSDI SENIK')->first();
        $this->actingAs($user);
        $this->visit('/reports/monthly_statistic_table_aduan')
            ->see('Report Aduan Bulanan');
    }

    public function testCreateComplainMenuink()
    {
        $user = User::whereName('RUSDI SENIK')->first();
        $this->actingAs($user);
        $this->visit('/complain')
            ->click('Tambah Aduan')
            ->see('Hantar Aduan')
            ->seePageIs('/complain/create');
    }
}
