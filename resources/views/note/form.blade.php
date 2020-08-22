<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 6/30/16
 * Time: 6:29 PM
 */
?>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label for="title">Title</label>
            <input class="form-control" type="text" name="title" value="{{ $note->title??'' }}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label for="note">Note</label>
            <input class="form-control" type="text" name="note" value="{{ $note->note??'' }}">
        </div>
    </div>
</div>
