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
      $this->call('InvoiceTableSeeder');
      $this->call('TransactionTableSeeder');
      $this->call('PaymentTableSeeder');
    }
}

class InvoiceTableSeeder extends Seeder {
  public function run() {
    DB::insert('insert into invoices (description, amount) values (?,?)', array('Jan2017', 300.00));
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
