<x-kasir>
    <div class="card">
     <div class="card-header">
         <div class="card-title col-md-12">Tambah Data Transaksi
            <hr>
         </div>
         <button href="" class="btn btn-success " data-toggle="modal" data-target=".bd-example-modal-lg" ><i class="fa fa-plus"></i> Tambah data</button>
     </div>
 
     <div class="card-body">
       <form action="">
        @csrf
        <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th width="160px" scope="col"><center>no</center></th>
                <th scope="col"><center>Barang</center></th>
                <th scope="col"><center>Harga</center></th>
                <th scope="col"><center>Qty</center></th>
                <th scope="col"><center>Sub Total</center></th>
                <th scope="col"><center>Aksi</center></th>
              </tr>
            </thead>
            <tbody>
               <tr>
                   <th scope="row"><center>1</center></th>
                   <td>lorem</td>
                   <td>lorem</td>
                   <td>lorem</td>
                   <td>lorem</td>
                   <td>
                       <center>
                           <a href="" class="btn btn-danger"><i class="fa fa-trash"></i> </a>
                       </center>
                   </td>
               </tr>
               <tr>
                   <td>Total</td>
                   <td colspan="3"></td>
                   <td colspan="2">lorem</td>
               </tr>
               <tr>
                   <td>Diskon</td>
                   <td colspan="3"></td>
                   <td colspan="2">lorem</td>
               </tr>
               <tr>
                   <td>Seluruh Total</td>
                   <td colspan="3"></td>
                   <td colspan="2">lorem</td>
               </tr>
               
             
           
            </tbody>
          </table>

          
          <hr>
           <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">No Transaksi</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan No Transaksi">
                  
                  </div>
               </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Uang Pembelian</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Uang pembelian">
                  
                  </div>
               </div>
            </div>
           <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Transaksi</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                  
                  </div>
               </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Uang Kembalian</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Uang Kembalian">
                  
                  </div>
               </div>
            </div>

         
                    <button class="btn btn-primary float-end"><i class="fa fa-save"></i> Simpan</button>
               
       </form>



           
     </div>
    </div>


  

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle"><strong>Data Barang</strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlSelect1">nama Barang</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                      <option>--pilih--</option>
                      <option>lorem</option>
                      <option>lorem</option>
                      <option>lorem</option>
                      <option>lorem</option>
                      
                    </select>
                  </div>
               
                <div class="form-group">
                    <label for="exampleInputEmail1">harga</label>
                    <input type="number" class="form-control" value="1" id="exampleInputEmail1" aria-describedby="emailHelp" >
                  
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Stok</label>
                    <input type="number" class="form-control" value="1" id="exampleInputEmail1" aria-describedby="emailHelp" >
                  
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Qty</label>
                    <input type="number" class="form-control" value="1"  id="exampleInputEmail1" aria-describedby="emailHelp" >
                  
                  </div>

                  <div class="modal-footer">
                     <button class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
                  </div>
            </form>
              </div>
    </div>
   
  </div>
</div>
 </x-kasir> 