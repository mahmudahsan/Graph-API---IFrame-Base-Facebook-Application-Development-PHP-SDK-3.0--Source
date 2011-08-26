<style type="text/css">
    #tabs ul li{
        font-size: 80%;
    }
    #tabs pre{
        font-size: 138%;
    }
    #tabs{
        font-size: 70%;
    }
    #tabs div a{
        color: blue;
    }
</style>
<div id="tabs">
    <ul>
        <li><a href="#fragment-1"><span>User Information</span></a></li>
        <li><a href="#fragment-2"><span>FQL Query</span></a></li>
        <li><a href="#fragment-3"><span>Stream Publish</span></a></li>
        <li><a href="#fragment-4"><span>Status Update</span></a></li>
        <li><a href="#fragment-5"><span>Iframe Size (Increase/Decrease How To)</span></a></li>
    </ul>
    <div id="fragment-1">
        <img src="http://graph.facebook.com/<?=$user?>/picture" alt="user photo" />
        <br />
        <div style="height: 400px; overflow: auto">
            <?php d($user); ?>
            <strong>PHP Session</strong>
            <?php d($_SESSION); ?>
            <strong> User's Basic Info</strong>
            <?php d($userInfo); ?>
        </div>
    </div>
    <div id="fragment-2">
        <div style="height: 400px; overflow: auto">
        <?php
            echo "FQL QUERY Graph API Base: " . $fql;
            d($fqlResult);
        ?>
        </div>
    </div>
    <div id="fragment-3">
        <a href="#" onclick="publishStream(); return false;">Click Here To Show A DEMO Stream Publish Box</a>
    </div>
    <div id="fragment-4">
        <form name="statusUpdate" action="" method="">
            <textarea name="status" id="status" rows="4" cols="50"></textarea>
            <br />
            <input type="button" onclick="updateStatus(); return false;" value="Update Status via AJAX And PHP API" />
            <br />
            <input type="button" onclick="updateStatusViaJavascriptAPICalling(); return false;" value="Update Status via Facebook Javascript Library" />
        </form>
    </div>
    <div id="fragment-5">
        <a href="#" onclick="increaseIframeSize(300, 500); return false;">Click Here Iframe width=300,height=500</a>
        <br />
        Facebook has a maximum width for iframe. If you provide more than the width then facebook will set the predefined maximum width not your width.
        <br />
        <a href="#" onclick="increaseIframeSize(950, 1800); return false;">Click Here Iframe width=950,height=1800</a>

    </div>
</div>