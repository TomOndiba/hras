<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">

        Daftar BPJS Kesehatan 
        <span class="pull-right add-btn hidden-xs">
            <a href="#collapseFilter" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseFilter"><span class="fa fa-search"> Cari</span></a> |
            <a href="<?php echo site_url('admin/bpjs/add'); ?>" role="button"><span class="fa fa-plus"> Tambah</span></a>
        </span>
        <span class="pull-right add-btn hidden-lg hidden-md hidden-sm">
            <a href="#collapseFilter" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseFilter"><span class="fa fa-search"></span></a> |
            <a href="<?php echo site_url('admin/bpjs/add'); ?>" role="button"><span class="fa fa-plus"></span></a>
        </span>
    </div>
     
   
    <div class="collapse" id="collapseFilter">
        <?php echo form_open(current_url(), array('method' => 'get')) ?> <br>
        <div class="row">                
            <div class="col-md-2">
                <input autofocus type="text" name="n" placeholder="NIK" value="" class="form-control">
            </div>  
            <div class="col-md-2">
                <input type="text" name="k" placeholder="KTP" value="" class="form-control">
            </div>               

            <input type="submit" style="border-radius:10px 0px 10px 0px" class="btn btn-success" value="Cari">
            <span class="right">  
                <?php if ($this->session->userdata('user_role') == ROLE_SUPER_ADMIN) { ?>
                    <a class ="btn btn-md btn-danger" href ="<?php echo site_url('admin/bpjs/delete'); ?>" onclick="return confirm('Apakah Anda akan menghapus semua data Entitas?')">Hapus Semua Entitas</a></span>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php echo form_close() ?> 
    </div>
    <form action="<?php echo site_url('admin/bpjs/multiple'); ?>" method="post">
        <button data-toggle="tooltip" data-placement="top" title="Cetak" class="btn btn-sm btn-success" style="border-radius:10px 0px 10px 0px" name="action" value="printPdf";"><span class="fa fa-print"></span>&nbsp;Print</button>
        <button data-toggle="tooltip" data-placement="top" title="Tambah ke daftar cetak" class="btn btn-sm btn-info" style="border-radius:10px 0px 10px 0px" name="action" value="cetak"><span class="fa fa-check"></span>&nbsp;Daftar Cetak</button>       


        <!-- Indicates a successful or positive action -->
        <div class="table-responsive">
            <table class="table table-condensed">
                <thead class="thed">
                    <tr>
                        <th><input type="checkbox" id="selectall" value="checkbox" name="checkbox"></th>
                        <th>NIK</th>
                        <th>NIK KTP</th>
                        <th>NAMA</th>
                        <th>HUB KELUARGA</th>
                        <th>FASKES</th>                        
                        <th>AKSI</th>
                    </tr> 
                </thead>
                <?php
                if (!empty($bpjs)) {
                    foreach ($bpjs as $row) {
                        ?>
                        <tbody class="tbodies"> 
                         <tr>
                             <td><input type="checkbox" class="checkbox" name="msg[]" value="<?php echo $row['bpjs_id']; ?>"></td>                           
                             <td class="tabls" ><?php echo $row['bpjs_npp']; ?></td>
                             <td class="tabls" ><?php echo $row['bpjs_ktp']; ?></td>
                             <td class="tabls" ><?php echo $row['bpjs_name']; ?></td>
                             <td class="tabls" ><?php echo $row['bpjs_hub']; ?></td>
                             <td class="tabls" ><?php echo $row['bpjs_faskes']; ?></td>                                
                             <td>
                                <a data-toggle="tooltip" data-placement="top" title="Detail" class="btn btn-warning btn-xs" href="<?php echo site_url('admin/bpjs/detail/' . $row['bpjs_id']); ?>" ><span class="glyphicon glyphicon-eye-open"></span></a>
                                <a data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-success btn-xs" href="<?php echo site_url('admin/bpjs/edit/' . $row['bpjs_id']); ?>" ><span class="glyphicon glyphicon-edit"></span></a>
                                <a data-toggle="tooltip" data-placement="top" title="Print Kartu" class="btn btn-danger btn-xs view-pdf" href="<?php echo site_url('admin/bpjs/printPdf/' . $row['bpjs_id']) ?> " ><span class="glyphicon glyphicon-print"></span></a>
                                <a data-toggle="tooltip" data-placement="top" title="Daftar Cetak" class="btn btn-primary btn-xs" href="<?php echo site_url('admin/bpjs/cetak/' . $row['bpjs_id']); ?>" ><span class="fa fa-check"></span></a>
                            </td>
                        </tr>
                    </tbody>
                    <?php
                }
            } else {
                ?>
                <tbody>
                </form>
                <tr id="row">
                    <td colspan="6" align="center">Data Kosong</td>
                </tr>
            </tbody>
            <?php
        }
        ?>   
    </table>
</div>
<div >
    <?php echo $this->pagination->create_links(); ?>
</div>
</div>
</div>

<script>
    $(document).ready(function() {
        $("#selectall").change(function() {
            $(".checkbox").prop('checked', $(this).prop("checked"));
        });
    });
</script>

<script type="text/javascript">
    (function(a){a.createModal=function(b){defaults={title:"",message:"Your Message Goes Here!",closeButton:true,scrollable:false};var b=a.extend({},defaults,b);var c=(b.scrollable===true)?'style="max-height: 420px;overflow-y: auto;"':"";html='<div class="modal fade" id="myModal">';html+='<div class="modal-dialog">';html+='<div class="modal-content">';html+='<div class="modal-header">';html+='<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';if(b.title.length>0){html+='<h4 class="modal-title">'+b.title+"</h4>"}html+="</div>";html+='<div class="modal-body" '+c+">";html+=b.message;html+="</div>";html+='<div class="modal-footer">';if(b.closeButton===true){html+='<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>'}html+="</div>";html+="</div>";html+="</div>";html+="</div>";a("body").prepend(html);a("#myModal").modal().on("hidden.bs.modal",function(){a(this).remove()})}})(jQuery);

/*
* Here is how you use it
*/
$(function(){    
    $('.view-pdf').on('click',function(){
        var pdf_link = $(this).attr('href');
        //var iframe = '<div class="iframe-container"><iframe src="'+pdf_link+'"></iframe></div>'
        //var iframe = '<object data="'+pdf_link+'" type="application/pdf"><embed src="'+pdf_link+'" type="application/pdf" /></object>'        
        var iframe = '<object type="application/pdf" data="'+pdf_link+'" width="100%" height="400">No Support</object>'
        $.createModal({
            title:'E-id BPJS Kesehatan',
            message: iframe,
            closeButton:true,
            scrollable:false
        });
        return false;        
    });    
})
</script>

