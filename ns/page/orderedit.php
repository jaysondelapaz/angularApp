
<!-- Modal edit-->
<div class="modal fade" id="Modal_Edit" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="alert alert-success" id="alertbox" role="alert" style="width:300px; margin:0px auto;display:none;">
                  <strong>{{m}}</strong>
                </div>

                 <div class="alert alert-danger" id="errormsg" role="alert" style="width:300px; margin:0px auto;display:none;">
                  <strong>{{m}}</strong>
                </div>


                 <div class="alert alert-success" id="alertbox" role="alert" style="width:300px; margin:0px auto;display:none;">
                  <strong>{{m}}</strong>
                </div>

                 <div class="alert alert-danger" id="errormsg" role="alert" style="width:300px; margin:0px auto;display:none;">
                  <strong>{{m}}</strong>
                </div>

            </div>
            <div class="modal-body col-md-12">

               

                                    <form class="form-inline"  id="FormInput">
                                       <?php /* <div class="md-form" style="margin-right: 15px;">
                                        <textarea class="form-control" ng-model="b.description" ></textarea>

                                         <!--<select id="store" ng-model="selectedStores" 
                                                ng-options="item.cname for item in customerlist"
                                                ng-init="selectedStores=customerlist[0">
                                            </select> {{item.cname}} -->

                                          </div> */ ?>

                                        <div class="md-form form-sm" >
                                       <input type="hidden" id="ids" ng-model="ID" class="form-control" style="width:80px"/>
                                       
                                        </div>
                                       
                                        <div class="md-form form-sm" >
                                              
                                                <select ng-model="editselectedProduct" ng-change="LoadPriceEdit();" >
                                                 <option value="" disabled selected>Select Product</option>
                                                    <?php
                                                        $l = new apiFunction;
                                                        $cat = $l->_select("producttable");
                                                        while($g = $cat->fetch_object()){
                                                            echo"<option value='$g->productCode'> ".$g->productName."</option>";
                                                        }   
                                                    ?>
                                              }
                                              }
                                              </select>
                                        </div>

                                         <div class="md-form form-sm" >
                                              
                                                <select ng-model="editselectML">
                                                 <option value="" disabled selected>100ML / 50ML</option>
                                                 <option value="100">100ML</option>
                                                 <option value="50">50ML</option>
                                                   
                                              </select>
                                        </div>


                                    
                                        <div class="md-form form-sm" ng-repeat="medit in CustomerPrice" >
                                         <input type=""  id="editprice" ng-value="{{medit.Price}}" ng-model="editprice"  ng-change="edittotal();"  class="form-control" style="width:80px" />
                                           <label for="price"></label>
                                             
                                        </div>

                                         <div class="md-form form-sm" >
                                             
                                                <input type="number" id="qty" value="" ng-model="editqty" ng-change="edittotal();" class="form-control" style="width:80px"/>
                                                <label for="qty">Qty</label>

                                           
                                        </div>
                                       


                                        <div class="md-form form-sm" style="margin-top:-20px;font-weight: bold;font-size: 1.2em;">
                                            Total: <input  class="form-control" ng-model="editTotal" value="{{editTotal | number}}" style="border:none;margin-left:5px;font-weight:bold;font-size:1em; margin-top:15px;width:70px;"/>

                                        </div>     

                                            
                                       

                                        

                                        <div class="md-form form-sm">

                                            <!--<button class="btn " ng-click="Addrow();">save</button> -->
                                            <button class="btn btn-#c62828 red darken-3"  ng-click="AddrowEdit();" 
                                                 ng-keydown="($event.keyCode === 13 || $event.keyCode === 32) && AddrowEdit();" style="display:none;">Add</button>
                                           
                                        </div>

                                    </form> 

                 <!--Table container-->      


                <div class="col-md-12" style="">
                    <table class="table table-responsive" >

                    <!--Table head-->
                    <thead class="red darken-3">
                        <tr>                           
                            <th>ProductCode</th>
                            <th>ML</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Action</th>
                            <th><button ng-click="update();">update</button></th>
                          
                        </tr>
                    </thead>
                    <!--Table head-->

                    <!--Table body-->
                    <tbody>
                        <tr ng-repeat="dtl in edit_details">
                          
                            <td>{{dtl.productCode}}</td>
                            <td>{{dtl.ML}}</td>
                            <td>{{dtl.price}}</td>
                            <td>{{dtl.qty}}</td>
                            <td>{{dtl.totals}}</td>
                           <?php // <td style="">{{dtl.orderid}}</td> ?>
                             <td> &nbsp;<i class="fa fa-remove" ng-click="editRemoverow(dtl);" aria-hidden="true"></i></td>
                             
                          
                        </tr>
                    </tbody>
                    <tfooter>
                    <tr>
                    <td></td>
                   <td></td>
                   <td></td>
                    <td style="font-weight: bold;">Total:{{}}</td>
                     <td>{{edit_details|sumByKey:'totals' | number:2}}</td>
                     <td>{{dtl.orderid}}
                    </tr>
                    </tfooter>   
                   </table>  
                    
                </div> <!--End of table container-->
               
            </div><!--MODAL BODY-->
           
        </div>
    </div>
</div><!--END OF editMODAL-->

