
<!DOCTYPE html>
<html>
<head>

  <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>

  <!-- Jquery JS -->
  <script type="text/javascript" src="js/jquery.min.js"></script>

  <!-- Angular JS -->
  <script type="text/javascript" src="js/angular.min.js"></script>
  
  <!-- Xeditable JS -->
  <script type="text/javascript" src="js/xeditable.js"></script>
  
  <!-- Bootsrap CSS -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

  <!-- Bootstrap JS -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>  

  <!-- Xeditable CSS -->
  <link rel="stylesheet" type="text/css" href="css/xeditable.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <title>Angular crud</title>

</head>

<body>
	<div class='container' ng-app="app" ng-controller="Ctrl">
		<h1>Items crud</h1>
		<p class="lead">Example of items crud with angularjs.</p>
		<div class='row' style="margin-bottom:10px">
			<div class='col-md-12 text-right'>
				<button class="btn btn-success pull-right" ng-click="addItem()">Add row</button>
			</div>
		</div>
		<div class='panel panel-primary'>
			<div class='panel-body'>
				<table class="table table-bordered table-hover table-striped">
					<tr>
						<th>Id</th>
						<th>Var 1</th>
						<th>Var 2</th>
						<th>Var 3</th>
						<th>Actions</th>
					</tr>
					<tr ng-repeat="item in items">
						<td>
							<!-- id of item -->
							<span e-name="id" e-form="rowform" e-required>
							{{ item.id || 'empty' }}
							</span>
						</td>
						<td>
							<!-- editable var1 -->
							<span editable-text="item.var1" e-name="var1" e-form="rowform" e-required>
							{{ item.var1 || 'empty' }}
							</span>
						</td>
						<td>
							<!-- editable var2 -->
							<span editable-text="item.var2" e-name="var2" e-form="rowform" e-required>
							{{ item.var2 || 'empty' }}
							</span>
						</td>
						<td>
							<!-- editable var3 -->
							<span editable-text="item.var3" e-name="var3" e-form="rowform" e-required>
							{{ item.var3 || 'empty' }}
							</span>
						</td>
						<td style="white-space: nowrap" class='text-center'>
							<!-- form -->
							<form editable-form name="rowform" onbeforesave="saveItem($data, item)" ng-show="rowform.$visible" class="buttons" shown="inserted == item">
								<button type="submit" ng-disabled="rowform.$waiting" class="btn btn-primary">save</button> 
								<button type="button" ng-disabled="rowform.$waiting" ng-click="rowform.$cancel();cancelItem($index, item)" class="btn btn-default">cancel</button>
							</form>
							<div class="buttons" ng-show="!rowform.$visible">
								<button class="btn btn-primary" ng-click="rowform.$show()">edit</button> 
								<button class="btn btn-danger" ng-click="removeItem($index, item)">del</button>
							</div>  
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>


<script type='text/javascript' src="js/angular-functions.js"></script>

  <script>
  // tell the embed parent frame the height of the content
  if (window.parent && window.parent.parent){
    window.parent.parent.postMessage(["resultsFrame", {
      height: document.body.getBoundingClientRect().height,
      slug: "NfPcH"
    }], "*")
  }
</script>

</body>

</html>

