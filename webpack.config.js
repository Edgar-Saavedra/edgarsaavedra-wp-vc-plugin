const webpack = require('webpack'); //to access built-in plugins
const path = require('path');

const config = {
    entry: {
        //ExampleApp : './assets/js/Apps/JS/ExampleApp/index.js',
        //ExampleReact : './assets/js/Apps/React/ExampleReact/index.js'
    },
    output: {
        path: path.resolve(__dirname, 'assets/dist/'),
        filename: "[name].js"
    },
    externals: {
        //don't bundle the 'react' npm package with our bundle.js
        //but get it from a global 'React' variable
        'react': 'React',
        'react-dom': 'ReactDOM',
        'jquery': '$',
        'Router' : 'react-router-dom',
        'Route' : 'react-router-dom',
        'Link' : 'react-router-dom'
        //'ReactRedux' : 'redux',
    },
    module: {
        rules: [
            {
                test: /\.json$/,
                loader: 'json-loader'
            },
            {
                //https://stackoverflow.com/questions/39853646/how-to-import-a-css-file-in-a-react-component
                test: /\.css$/,
                loader: "style-loader!css-loader",
                options: {
                    minimize: true || {/* CSSNano Options */}
                }
            },
            {
                test: /\.ts$/,
                loader: 'ts-loader'
            },
            {
                test: /.jsx?$/,
                loader: 'babel-loader',
                exclude: /node_modules/,
                query: {
                    presets: ['es2015', 'react'],
                    //presets: ['es2015'],
                    cacheDirectory: true
                }
            }
        ]
    }
};

module.exports = config;
