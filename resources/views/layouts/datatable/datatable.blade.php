<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<div class="card">
  <div class="card-header"> 
    <div class="action-buttons">
      @foreach ($actionButtons as $buttons)
      <a class="<?php echo !empty($butons['css_class']) ? $buttons['css_class'] : 'btn btn-primary'; ?>" 
          href="<?php echo !empty($buttons['link']) ? $buttons['link'] : '#'; ?>"><?php echo !empty($buttons['label']) ? $buttons['label'] : 'New Item'; ?></a>
      @endforeach      
    </div>
  </div><!-- /.card-header -->

  <div class="card-body">
    <table id="grid-table" class="table table-bordered table-striped">
      <thead>
      <tr>
        @foreach($dataTableHeading as $dataHeading)
        <th>{{ $dataHeading }}</th>
        @endforeach
      </tr>
      </thead>
      <tbody>
        @foreach ($dataTableItems as $dataItems)
          <tr>
            @foreach ($dataItems as $item)
              <td><?php echo $item ?></td>
            @endforeach
          </tr>
        @endforeach      
    </table>
  </div><!-- /.card-body -->
</div><!-- /.card --> 