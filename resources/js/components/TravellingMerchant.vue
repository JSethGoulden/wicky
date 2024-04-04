<script setup>
// response.parse.text[Object.keys(response.parse.text)[0]]
// parser.parseFromString(response.parse.text[Object.keys(response.parse.text)[0]], 'application/xml')
const getItems = async () => {
    const response = await axios({
        method: "get",
        url: "https://runescape.wiki/api.php?format=json&action=parse&prop=text&disablelimitreport=1&text={{Travelling%20Merchant/api%7Cformat=simple}}",
        headers: {
            "x-requested-with": undefined,
        },
    });
    // Parse the JSON response
    const data = JSON.parse(response);

    // Check if the 'parse' key exists and if it contains 'text' key
    if (data.parse && data.parse.text) {
        // Extract text content
        const textContent = data.parse.text["*"];

        // Split the text content into an array of items
        const items = textContent.split("\u00a6");

        // Remove any leading/trailing white spaces from each item
        const cleanedItems = items.map((item) => item.trim());

        // Return the array of items
        return cleanedItems.filter((item) => item !== "");
    } else {
        // If the required keys are missing, return an empty array
        return [];
    }
};

console.log(await getItems());
</script>
<template>
    <div>Traveling merchand stuff</div>
</template>
