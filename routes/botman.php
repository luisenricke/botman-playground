<?php
use App\Http\Controllers\BotManController;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});
$botman->hears('Start conversation', BotManController::class.'@startConversation');

$botman->hears('image', function (BotMan $bot) {
    // Create attachment
    $attachment = new Image('https://botman.io/img/logo.png');

    // Build message object
    $message = OutgoingMessage::create('This is my text')
                ->withAttachment($attachment);

    // Reply message object
    $bot->reply($message);
});


$botman->fallback(function($bot) {
    $bot->reply('Lo siento, el comando ingresado no esta habilitado');
});