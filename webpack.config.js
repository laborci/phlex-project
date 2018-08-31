var path = require("path");
var glob = require("glob");
var webpack = require("webpack");
var frontend = require("./@webpack-entry-points");

function getEntries(){
	var entries = {};
	var folder;
	for(folder in frontend){
		Object.assign(entries, getFolderEntries(folder, frontend[folder]));
	}
	return entries;
}

function getFolderEntries(folder, prefix){
	return glob.sync(folder + "/*.js").reduce((entries, entry) => Object.assign(entries, {
		[prefix + entry.replace(folder + "/", '').replace('.js', '')]: entry
	}), {});
}

module.exports = {
	entry: getEntries(),

	output: {
		filename: '[name].js',
		path: path.resolve(__dirname, 'public/dist')
	},
	resolve: {
		modules: [
			path.resolve('./node_modules')
		]
	},
	module: {
		rules: [
			{
				test: /\.js$/,
				//exclude: /node_modules/,
				loader: "babel-loader",
				query: {
					plugins: ["transform-decorators-legacy", "transform-class-properties", "transform-object-rest-spread"]
				}
			},
			{
				test: /\.(html|twig)$/,
				use: {
					loader: 'html-loader'
				}
			},

			{
				test: /@\.less$/,
				use: [
					{loader: "html-loader"},
					{loader: "less-loader"}
				]
			},
			{
				//test: /\.less$/,
				test: /[^@]\.less$/,
				use: [
					{loader: "style-loader"},
					{loader: "css-loader"},
					{loader: "less-loader"}
				]
			},

			{
				test: /\.css$/,
				use: [
					{loader: "style-loader"},
					{loader: "css-loader"}
				]
			}
		]
	}
};
