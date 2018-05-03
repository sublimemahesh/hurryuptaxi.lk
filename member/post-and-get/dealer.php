<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

include_once(dirname(__FILE__) . '/../auth.php');


if (isset($_POST['add-dealer'])) {
    $DEALEAR = new Dealer(NULL);
    $VALID = new Validator();

    $DEALEAR->name = filter_input(INPUT_POST, 'name');

    $VALID->check($DEALEAR, ['name' =>
            ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $DEALEAR->create();

        if (!isset($_SESSION)) {
            session_start();
        }
        $VALID->addError("Your data was saved successfully", 'success');
        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

if (isset($_POST['edit-dealer'])) {
    $DEALEAR = new Dealer($_POST['id']);

    $DEALEAR->name = $_POST['name'];

    $VALID = new Validator();
    $VALID->check($DEALEAR, ['name' =>
            ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $DEALEAR->update();

        if (!isset($_SESSION)) {
            session_start();
        }
        $VALID->addError("Your changes saved successfully", 'success');
        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

