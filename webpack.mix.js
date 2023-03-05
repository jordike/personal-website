let mix = require("laravel-mix");
const { readdirSync } = require("fs");

function fetchFiles(directory, fileExtension) {
    const files = readdirSync(`${__dirname}/${directory}`);
    let result = [];

    for (const file of files) {
        if (file.endsWith(fileExtension)) {
            result.push({
                directory: directory,
                file: file
            });
        } else if (!file.includes(".")) {
            const subDirectory = `${directory}/${file}`;

            for (const subFile of fetchFiles(subDirectory, fileExtension)) {
                result.push({
                    directory: subFile.directory,
                    file: subFile.file
                });
            }
        }
    }

    return result;
}

function minifyFiles(directory, fileExtension) {
    const files = fetchFiles(directory, fileExtension);

    for (const file of files) {
        const inputPath = `${__dirname}${file.directory}/${file.file}`;
        const outputPath = __dirname + file.directory.replace(/resources/g, "public") + "/" + file.file;

        mix.minify(inputPath, outputPath, true);
    }
}

minifyFiles("/resources/js", ".js");
minifyFiles("/resources/css", ".css");
