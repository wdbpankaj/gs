    
<table>
    <?php
        if(!empty($dataset))
        {
            $headers = array_keys($dataset[0]);
            if(count($headers)){
            echo '<tr>';
            foreach ($headers as $key => $value) { 
                echo '<th>'. $value .'</th>';
            }    
            echo '</tr>';
            }
           
            foreach ($dataset as $key => $value) {            
                echo '<tr>';
                foreach ($value as $k => $v) { 
                    echo '<td class="'. $v .'">' . $value[$k] . '</td>';            
                }
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
        }
    ?>
</table>
<script type="text/javascript">
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
                getGridData();
            }
        });
    });
</script>

