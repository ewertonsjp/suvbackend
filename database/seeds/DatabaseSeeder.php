<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder {
    /**
     * Run the database seeds.
     * @return void
     */
    public function run() {
      Model::unguard();
      $this->call('FamilyTableSeeder');
      $this->call('UserTableSeeder');
      $this->call('InvoiceTableSeeder');
      $this->call('TransactionTableSeeder');
      $this->call('PaymentTableSeeder');
    }
}

class FamilyTableSeeder extends Seeder {
  public function run() {
    DB::insert('insert into families (name, description, code) values (?,?,?)', array('APT Mãos de Vaca','APT dos mãos de VACA de PLT',9999));
  }
}

class UserTableSeeder extends Seeder {
  public function run() {
    DB::table('users')->insert([
        'name' => 'ewertonsjp',
        'email' => 'ewertonsjp@gmail.com',
        'password' => bcrypt('123456'),
        'family_id' => 1
    ]);
    DB::table('users')->insert([
        'name' => 'enfermeiro gay',
        'email' => 'enfermeiro@gmail.com',
        'password' => bcrypt('123456'),
        'family_id' => 1
    ]);
  }
}

class InvoiceTableSeeder extends Seeder {
  public function run() {
    DB::insert('insert into invoices (description, amount, family_id) values (?,?,?)', array('Jan2017', 300.00, 1));
  }
}

class TransactionTableSeeder extends Seeder {
  public function run() {
    DB::insert('insert into transactions (description, amount, invoice_id) values (?,?,?)', array('Luz', 60.00, 1));
    DB::insert('insert into transactions (description, amount, invoice_id) values (?,?,?)', array('Água', 40.00, 1));
    DB::insert('insert into transactions (description, amount, invoice_id) values (?,?,?)', array('Faxina', 50.00, 1));
    DB::insert('insert into transactions (description, amount, invoice_id) values (?,?,?)', array('Aluguel', 150.00, 1));
  }
}

class PaymentTableSeeder extends Seeder {
  public function run() {
    DB::insert('insert into payments (amount, user_id, invoice_id) values (?,?,?)', array(300.00,1,1));
  }
}
