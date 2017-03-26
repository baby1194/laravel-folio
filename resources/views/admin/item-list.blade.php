
@extends('space::admin.layout')

<?php
	$settings_title = config('space.title');
	if($settings_title == '') {
		$settings_title = "Space";
	}
	$site_title = 'Items | '. $settings_title;
?>

@section('scripts')

    <script type="text/javascript" src="/nonoesp/space/js/manifest.js"></script>
    <script type="text/javascript" src="/nonoesp/space/js/vendor.js"></script>
    <script type="text/javascript" src="/nonoesp/space/js/space.js"></script>

<script type="text/javascript">
Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');

var months = [
	'january',
	'february',
	'march',
	'april',
	'may',
	'june',
	'july',
	'august',
	'september',
	'october',
	'november',
	'december',
	'jan',
	'feb',
	'mar',
	'apr',
	'may',
	'jun',
	'jul',
	'aug',
	'sep',
	'oct',
	'nov',
	'dec'
];

var days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];

<?php
foreach($items as $item) {
	$item->hidden = false;
}
foreach($existing_tags as $tag) {
	$tag->selected = false;
}
 ?>

var admin = new Vue({
el: '.c-admin',
data: {
	items: {!! $items !!},
	tags: {!! $existing_tags !!},
	date: '{{Date::now()}}',
	unfiltered: true
},
watch: {
	tags: {
		handler: function(value, old) {
			var unfiltered = true;
			for(var i in this.tags) {
				if(this.tags[i].selected) {
					unfiltered = false;
				}
			}
			this.unfiltered = unfiltered;
			console.log(this.unfiltered);
		},
		deep: true
	}
},
computed: {
	test: function (item) {
		return 'March';
	}
},
methods: {
	update_item: function(item) {
		console.log('test');
		console.log(item);
		console.log(item.deleted_at);
		//property.is_updating = true;
	},
	toggle_item: function(item) {

		var url = '/api/item/delete';
		if(item.deleted_at) {
			url = '/api/item/restore';
		}

		this.$http.post(url, {id: item.id}).then((response) => {
				// success
				item.deleted_at = response.body.item.deleted_at;
		}, (response) => {
				// error
		});
	},
	update_item: function(item, update) {

		this.$http.post('/api/item/update', {id: item.id, update: update}).then((response) => {
				// success
				console.log('updated item');
				console.log(response.body.item);
		}, (response) => {
				// error
		});
	},
	trash_item: function(item) {
		console.log('trash');
	},
	human_date: function (item) {
		var d = new Date(item.published_at);
		return months[d.getMonth()] + ' ' + (d.getUTCDate()-1) + ', ' + (d.getYear()+1900) + ' ('+days[d.getDay()]+')';
	},
	edit_href: function (item) {
		return '/{{ Space::adminPath() }}item/edit/'+item.id;
	},
	tag_with_slug: function(slug) {
		for(var i in this.tags) {
			var tag = this.tags[i];
			if(tag.slug == slug) {
				return tag;
			}
		}
	},
	display_all_tags: function() {
		for(var i in this.tags) {
			this.tags[i].selected = false;
		}
		for(var i in this.items) {
			this.items[i].hidden = false;
		}
	},
	filter_by_tag: function(tag) {
		for(var i in this.tags) {
			this.tags[i].selected = false;
		}
		tag.selected = true;
		for(var i in this.items) {
			var item = this.items[i];
			var tags_str = item.tags_str;
			var tags = "";
			if(tags_str != null) {
				var tags = item.tags_str.replace(" ", "").split(',');
				item.hidden = !tags.includes(tag.slug);
			} else {
				item.hidden = true;
			}
		}
	}
}
});

</script>

@stop

@section('title', 'Items')

	@section('content')

	<div class="[ c-admin ] [ admin-list ]">

		{{-- Tag Cloud --}}

		<div class="[ c-admin__existing-tags ] [ u-pad-b-2x ]">
			<ul>
				<li @click="display_all_tags()"
						v-bind:class="{ 'u-opacity--low': !unfiltered }"
						class="u-cursor-pointer">
					All
				</li>
				<li v-for="tag in tags" class="u-cursor-pointer"
				   @click="filter_by_tag(tag)"
					 v-bind:class="{ 'u-opacity--low': !tag.selected }">
					 @{{ tag.slug }} · @{{ tag.count }}
				</li>
			<ul>
		</div>

		<!-------------------------------->

		{{-- Item List --}}

		<div v-for="item in items" class="admin-list-item" v-if="!item.hidden" ref="items">
			<p v-bind:class="{ 'u-opacity--half': item.deleted_at }">
				<a v-bind:href="edit_href(item)">
					@{{ item.title }}
				</a>
				<i v-if=" item.deleted_at" @click="toggle_item(item)"
					 class="[ fa fa-toggle-off fa--social ] [ u-cursor-pointer admin-list-optionLink is-invisible ]"></i>
				<i v-if="!item.deleted_at" @click="toggle_item(item)"
					 class="[ fa fa-toggle-on fa--social ] [ u-cursor-pointer admin-list-optionLink is-invisible ]"></i>
			</p>
			<p v-if="item.published_at > date" class="admin-list-itemDetails">
				Scheduled for <span style="text-transform:capitalize">@{{ human_date(item) }}</span>
			</p>
		</div>

	</div>

@endsection
