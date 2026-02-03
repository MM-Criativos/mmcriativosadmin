const fs=require(" fs\);
const lines=fs.readFileSync(\.env\,\utf8\).split(/\\r?\\n/);
for (let i=17;i<=27;i++){
 if(i < lines.length){
 console.log(${i+1}: );
 }
}
