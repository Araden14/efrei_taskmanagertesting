import http from 'k6/http';
import { sleep } from 'k6';
import { htmlReport } from "https://raw.githubusercontent.com/benc-uk/k6-reporter/main/dist/bundle.js";
import { textSummary } from "https://jslib.k6.io/k6-summary/0.0.1/index.js";

export let options = {
    stages: [
        { duration: '30s', target: 50 },
        { duration: '1m', target: 50 },  
        { duration: '30s', target: 0 },  
    ],
};

export default function () {
    http.get('http://localhost:3000');
    sleep(1);
}

// Generate HTML report at the end of the test
export function handleSummary(data) {
    return {
        "report.html": htmlReport(data),
        "summary.txt": textSummary(data, { indent: " ", enableColors: true }),
        "report.json": JSON.stringify(data)
    };
}
