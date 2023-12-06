<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletTransactions extends Model
{
    use HasFactory;

    public static $ACTION_DECREASE = "ACTION_DECREASE";
    public static $ACTION_INCREASE = "ACTION_INCREASE";
    public static $ACTION_COMMIT = "ACTION_COMMIT";

    public static $TYPE_CHANGE = "TYPE_CHANGE";
    public static $TYPE_SET = "TYPE_SET";
}
