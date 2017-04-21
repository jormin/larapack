<template>
	<div :id="table.info.name">
		<div class="panel panel-default">
			<div class="panel-heading">{{tableindex+1}}.&nbsp;{{table.info.name}}</div>
			<div class="panel-body">
		    	{{table.info.comment}}
		  	</div>
			<table class="table table-hover table-bordered table-striped" style="table-layout:fixed;">
				<thead>
					<tr class="info">
						<th width="10%" class="center">字段</th>
						<th width="16%" class="center">类型</th>
						<th width="10%" class="center">允许为空</th>
						<th width="5%" class="center">键</th>
						<th width="16%" class="center">默认值</th>
						<th width="16%" class="center">特性</th>
						<th width="22%" class="center">注释</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="field in table.fields">
						<td width="10%" style="word-wrap: break-word">{{field.field}}</td>
						<td width="16%" style="word-wrap: break-word">{{field.type}}</td>
						<td width="10%" class="center" style="word-wrap: break-word">{{field.null}}</td>
						<td width="5%" class="center">{{field.key}}</td>
						<td width="16%" style="word-wrap: break-word">{{field.default}}</td>
						<td width="16%" style="word-wrap: break-word">{{field.extra}}</td>
						<td width="22%" style="word-wrap: break-word">{{field.comment}}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</template>
<script>
	export default{
		props:['table','tableindex'],
	}
</script>