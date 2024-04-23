<form action="<?php echo route('createCategoryPost'); ?>" method="post" enctype="multipart/form-data">
    @csrf
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">
                <!-- left column -->
                <div class="col-md-6 offset-md-3 offset-sm-0">
                <!-- general form elements -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Basic information</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="categoryTitle">Category title</label>
                            <input required="required" type="text" class="form-control" name="categoryTitle" id="categoryTitle" placeholder="Enter category title">
                        </div>
                        <div class="form-group">
                            <label for="parentCategory">Parent category</label>
                            <select class="select2bs4" name="parentCategory" id="parentCategory" multiple="multiple" data-placeholder="Select categories" style="width: 100%;">
                                @foreach ( $itemData['parent'] as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="categoryStatus">Status</label>
                            <select required="required" class="select2bs4" name="categoryStatus" id="categoryStatus" data-placeholder="Select customer status" style="width: 100%;">
                                <option> -- Select status --</option>
                                <option value="active">Active</option>
                                <option value="blocked">Blocked</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <!-- /.card -->
                </div>
        </div>
        </div>
    </section>
</form>