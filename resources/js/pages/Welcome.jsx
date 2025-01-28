import React from 'react';
import RandomQuoteContainer from '../containers/RandomQuoteContainer.jsx';

export default function Welcome() {
    return (
        <div>
            <div className="bg-slate-700 p-4 rounded-md">
                <h1 className="text-white font-bold">Random Quotes</h1>
            </div>
            <div className="grid grid-cols-2">
                <RandomQuoteContainer source="forismatic" />
                <RandomQuoteContainer source="quoterism" />
                <RandomQuoteContainer source="zen" />
                <RandomQuoteContainer source="programming" />
            </div>
        </div>
    );
}
