<template>
  <table>
    <thead>
      <tr>
        <th>Title</th>
        <th>Episode number</th>
        <th>Opening crawl</th>
        <th>Director</th>
        <th>Producer</th>
        <th>Release date</th>
        <th>Species</th>
        <th>Starships</th>
        <th>Vehicles</th>
        <th>Characters</th>
        <th>Planets</th>
        <th>URL</th>
        <th>Created</th>
        <th>Edited</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="filmData in films.data" v-bind:key="filmData.title">
        <td><strong>{{ filmData.title }}</strong></td>
        <td>{{ filmData.episodeId }}</td>
        <td>{{ filmData.openingCrawl.slice(0, 15)}}</td>
        <td>{{ filmData.director }}</td>
        <td>{{ filmData.producer }}</td>
        <td>{{ filmData.releaseDate }}</td>
        <td>{{ filmData.species[0] }}</td>
        <td>{{ filmData.starships[0] }}</td>
        <td>{{ filmData.vehicles[0] }}</td>
        <td>{{ filmData.characters[0] }}</td>
        <td>{{ filmData.planets[0] }}</td>
        <td>{{ filmData.url }}</td>
        <td>{{ filmData.created }}</td>
        <td>{{ filmData.edited }}</td>
      </tr>
    </tbody>
  </table>
</template>

<script lang="ts">
  import axios from 'axios';
  export default {
    // eslint-disable-next-line
    data() {
      return {
        films: []
      }
    },
    created(): void {
      axios
        .post('character.film.list', {characterName: 'Luke'})
        .then((response: any) => {
          (this as any).films = response;
      })
    }
  }
</script>

<style scoped>
body {
	background: #fafafa url(https://jackrugile.com/images/misc/noise-diagonal.png);
	color: #444;
	font: 100%/30px 'Helvetica Neue', helvetica, arial, sans-serif;
	text-shadow: 0 1px 0 #fff;
}

strong {
	font-weight: bold; 
}

em {
	font-style: italic; 
}

table {
	background: #f5f5f5;
	border-collapse: separate;
	box-shadow: inset 0 1px 0 #fff;
	font-size: 12px;
	line-height: 24px;
	margin: 30px auto;
	text-align: left;
	width: 800px;
}	

th {
	background: url(https://jackrugile.com/images/misc/noise-diagonal.png), linear-gradient(#777, #444);
	border-left: 1px solid #555;
	border-right: 1px solid #777;
	border-top: 1px solid #555;
	border-bottom: 1px solid #333;
	box-shadow: inset 0 1px 0 #999;
	color: #fff;
  font-weight: bold;
	padding: 10px 15px;
	position: relative;
	text-shadow: 0 1px 0 #000;	
}

th:after {
	background: linear-gradient(rgba(255,255,255,0), rgba(255,255,255,.08));
	content: '';
	display: block;
	height: 25%;
	left: 0;
	margin: 1px 0 0 0;
	position: absolute;
	top: 25%;
	width: 100%;
}

th:first-child {
	border-left: 1px solid #777;	
	box-shadow: inset 1px 1px 0 #999;
}

th:last-child {
	box-shadow: inset -1px 1px 0 #999;
}

td {
	border-right: 1px solid #fff;
	border-left: 1px solid #e8e8e8;
	border-top: 1px solid #fff;
	border-bottom: 1px solid #e8e8e8;
	padding: 10px 15px;
	position: relative;
	transition: all 300ms;
}

td:first-child {
	box-shadow: inset 1px 0 0 #fff;
}	

td:last-child {
	border-right: 1px solid #e8e8e8;
	box-shadow: inset -1px 0 0 #fff;
}	

tr {
	background: url(https://jackrugile.com/images/misc/noise-diagonal.png);	
}

tr:nth-child(odd) td {
	background: #f1f1f1 url(https://jackrugile.com/images/misc/noise-diagonal.png);	
}

tr:last-of-type td {
	box-shadow: inset 0 -1px 0 #fff; 
}

tr:last-of-type td:first-child {
	box-shadow: inset 1px -1px 0 #fff;
}	

tr:last-of-type td:last-child {
	box-shadow: inset -1px -1px 0 #fff;
}	

tbody:hover td {
	color: transparent;
	text-shadow: 0 0 3px #aaa;
}

tbody:hover tr:hover td {
	color: #444;
	text-shadow: 0 1px 0 #fff;
}
</style>