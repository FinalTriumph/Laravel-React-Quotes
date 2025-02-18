import React from 'react';
import RandomQuoteContainer from '../containers/RandomQuoteContainer.jsx';
import SectionTitle from '../components/SectionTitle.jsx';

export default function Welcome() {
    return (
        <div className="text-left">
            <SectionTitle title="Random Quotes" />
            <div className="grid grid-cols-2">
                <RandomQuoteContainer source="forismatic" />
                <RandomQuoteContainer source="quoterism" />
                <RandomQuoteContainer source="zen" />
                <RandomQuoteContainer source="programming" />
            </div>
        </div>
    );
}
