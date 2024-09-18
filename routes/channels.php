<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('talk-processed.{id}', function ($user, $id) {
    return true;
});
