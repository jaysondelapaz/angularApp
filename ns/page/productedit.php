<!-- Edit Modal -->
<div class="modal fade" id="ProductModalEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>


            </div>
            <div class="modal-body" style="padding:50px;" ng-repeat =" j in editproductss" >
               <input type="" ng-value="{{j.ProductCode}}" ng-model="epCode" />
               {{j.productName}}

                        
               
            </div><!--MODAL BODY-->
           
        </div>
    </div>
</div><!--END OF MODAL-->

