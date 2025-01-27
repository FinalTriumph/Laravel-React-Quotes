import React from 'react';
import RandomQuoteContainer from '../containers/RandomQuoteContainer.jsx';

export default function Home({ name, email }) {
    return (
        <div>
            <div className="bg-slate-700 p-4 rounded-md">
                <h1 className="text-white font-bold">Welcome, {name}!</h1>
                <p className="text-white">Email: {email}</p>
            </div>
            <div className="grid grid-cols-2">
                <RandomQuoteContainer source="forismatic" save />
                <RandomQuoteContainer source="quoterism" save />
                <RandomQuoteContainer source="zen" save />
                <RandomQuoteContainer source="programming" save />
            </div>
        </div>
    );
}
