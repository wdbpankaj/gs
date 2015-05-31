
<table>
    <tr>
        <th style="display:none;">Application Id</th>
        <th>Application Name</th>
        <th>Description</th>
        <th></th>
    </tr>
    <?php
    foreach ($application_data as $key => $value) {
        echo '<tr>';
        echo '<td class="id" style="display:none;">' . $value['ApplicationId'] . '</td>';
        echo '<td class="name" >' . $value['ApplicationName'] . '</td>';
        echo '<td class="desc" >' . $value['Description'] . '</td>';
        echo '<td>'
        . '<div class="set1">'
        . '<a href="javascript:;" style="display:;" id="edit">Edit</a> '
        . '<a href="javascript:;" style="display:;" id="delete">Delete</a>'
        . '</div>'
        . '<div class="set2">'
        . '<a href="javascript:;" style="display:none;" id="update">Update</a> '
        . '<a href="javascript:;" style="display:none;" id="cancel">Cancel</a> '
        . '</div>'
        . '</td>';
        echo '</tr>';
    }
    ?>
</table>
<script>
    var aname='', adesc='';
    $("a#edit").click(function(){
        aname = $(this).closest('tr').find(".name").text();
        adesc = $(this).closest('tr').find(".desc").text();
        var txtname = '<input type="text" name="edit_appname" id="edit_appname" value="' + aname + '"/>';
        var txtdesc = '<input type="text" name="edit_appdesc" id="edit_appdesc" value="' + adesc + '"/>';
        $(this).closest('tr').find(".name").html(txtname);        
        $(this).closest('tr').find(".desc").html(txtdesc);
        $(this).css('display','none');
        $(this).closest('tr').find("#delete").css('display','none');
        $(this).closest('tr').find("#update").css('display','');
        $(this).closest('tr').find("#cancel").css('display','');        
    });

    $("a#cancel").click(function(){
        $(this).closest('tr').find(".name").html(aname);
        $(this).closest('tr').find(".desc").html(adesc);
        $(this).css('display','none');
        $(this).closest('tr').find("#delete").css('display','');
        $(this).closest('tr').find("#edit").css('display','');
        $(this).closest('tr').find("#update").css('display','none');
    });

    $("a#update").click(function(){
        var val = $(this).closest('tr').find(".id").text();
        updateRecord(val);
    });

    $(function () {
        $('.paging').pagination({
            items: '<?php echo $total_record; ?>',
            itemsOnPage: per_page,
            currentPage: '<?php echo $page_no; ?>',
            cssStyle: 'compact-theme',
            displayedPages: 3,
            edges: 2,
            hrefTextPrefix: 'javascript:;',
            onPageClick: function (pageNo) {
                page_no = pageNo;
                getapplication();
            }
        });
    });
</script>