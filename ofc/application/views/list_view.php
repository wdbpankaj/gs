    
<table>
    <tr>
        <th style="display:none;">State Id</th>
        <th>$headerName</th>
        <th></th>
    </tr>
    <?php
    foreach ($state_data as $key => $value) {
        echo '<tr>';
        echo '<td class="id" style="display:none;">' . $value['StateId'] . '</td>';
        echo '<td class="name">' . $value['StateName'] . '</td>';
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
    var sname='';
    $("a#edit").click(function(){
        var val = $(this).closest('tr').find(".name").text();
        sname = val;
        var txt = '<input type="text" name="edit_name" id="edit_name" value="' + val + '"/>';
        $(this).closest('tr').find(".name").html(txt);
        $(this).css('display','none');
        $(this).closest('tr').find("#delete").css('display','none');
        $(this).closest('tr').find("#update").css('display','');
        $(this).closest('tr').find("#cancel").css('display','');        
    });

    $("a#cancel").click(function(){
        $(this).closest('tr').find(".name").html(sname);
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
        var id = $('.slctcountry').val();                
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
                getState(id);
            }
        });
    });
</script>
