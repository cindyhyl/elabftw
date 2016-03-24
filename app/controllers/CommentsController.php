<?php
/**
 * app/controllers/CommentsController.php
 *
 * @author Nicolas CARPi <nicolas.carpi@curie.fr>
 * @copyright 2012 Nicolas CARPi
 * @see http://www.elabftw.net Official website
 * @license AGPL-3.0
 * @package elabftw
 */

namespace Elabftw\Elabftw;

/**
 * Controller for the experiments comments
 *
 */
require_once '../../inc/common.php';

try {
    $comments = new Comments();

    // CREATE
    if (isset($_POST['commentsCreate'])) {
        if ($comments->create(
            $_POST['commentsCreateId'],
            $_POST['commentsCreateComment'],
            $_SESSION['userid']
        )) {
            echo '1';
        } else {
            echo '0';
        }
    }

    // UPDATE
    if (isset($_POST['commentsUpdateComment'])) {
        if ($comments->update(
            $_POST['id'],
            $_POST['commentsUpdateComment'],
            $_SESSION['userid']
        )) {
            echo '1';
        } else {
            echo '0';
        }
    }

    // DESTROY
    if (isset($_POST['commentsDestroy'])) {
        if ($comments->destroy($_POST['commentsDestroyId'])) {
            echo '1';
        } else {
            echo '0';
        }
    }

} catch (Exception $e) {
    dblog('Error', $_SESSION['userid'], $e->getMessage());
}