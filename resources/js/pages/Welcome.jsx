import React from 'react';
import RandomQuoteContainer from '../containers/RandomQuoteContainer.jsx';

export default function Welcome() {
    return (
        <div>
            <div className="bg-custom-primary-2 shadow p-4 mb-4">
                <h1 className="font-bold">Random Quotes</h1>
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
