<?php

namespace suvinando\Services;
use suvinando\Payment;

class PaymentService {

  public function createPaymentForNewUsersOfFamily($invoice) {
    if (sizeof($invoice->family->users) != sizeof($invoice->payments)) {

      $users = collect([]);
      foreach ($invoice->payments as $payment) {
        $users->push($payment->user);
      }

      foreach ($invoice->family->users->diff($users) as $user) {
        $payment = new Payment();
        $payment->amount = $vlrUnit;

        //FIXME - GAMBIS ;(
        $payment->user_id = $user->id;
        $payment->invoice_id = $invoice->id;

        $user->payments->push($payment);
        $invoice->payments->push($payment);
      }
    }
  }

}
