var path = require('path');
var glob = require("glob");
var webpack = require("webpack");

function getEntries(){
	return Object.assign({},
		//getFolderEntries('./src', 'www-'),
		getFolderEntries('./App/Site/Admin/@assets', 'admin/'),
	);
}

function getFolderEntries(folder, prefix){
	return glob.sync(folder + "/*.js").
			reduce((entries, entry) => Object.assign(entries, {
				[prefix + entry.replace(folder + "/", '').replace('.js', '')]: entry
			}), {});
}

module.exports = {
	entry: getEntries(),

	output: {
		filename: '[name].js',
		path: path.resolve(__dirname, 'public/dist')
	},
    plugins: [
        new webpack.ProvidePlugin({
           $: "jquery",
           jQuery: "jquery"
       })
    ],
	module: {
		rules: [
			{
				test: /\.less$/,
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
					{loader: "css-loader"},
				]
			}
		]
	},

};

console.log(getEntries());

